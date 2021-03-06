package com.example.dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;
import java.util.Map;

import com.example.Database;
import com.example.entities.Photo;
import com.example.exception.CustomException;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

public class PhotoDao extends AbstractDao<Photo> {
    private static final Log LOG = LogFactory.getLog(PhotoDao.class);

    private static final String SQL_SELECT_REQUEST = "SELECT * FROM photo WHERE ";

    public PhotoDao() {
        super(SQL_SELECT_REQUEST);
    }

    @Override
    protected void getObjectFromResultSet(Map<Integer, Photo> map, ResultSet result) throws SQLException {
        Photo photo = new Photo(result.getInt("id"), result.getString("title"), result.getString("path"),
                result.getString("description"), result.getInt("id_hobbyactivity"));
        map.put(photo.getId(), photo);
    }

    @Override
    protected PreparedStatement getUpdateStatement(Photo photo, String request) throws SQLException {
        PreparedStatement statement = null;
        statement = Database.getInstance().prepareStatement(request, PreparedStatement.RETURN_GENERATED_KEYS);
        statement.setString(1, photo.getTitle());
        statement.setString(2, photo.getPath());
        statement.setString(3, photo.getDescription());
        statement.setInt(4, photo.getId_activity());
        return statement;
    }

    public List<Photo> findAllPhotos() {
        return getListFromRequest("1", null);
    }

    public Photo findPhotoById(int id) {
        List<Photo> photos = getListFromRequest("id=?", id);
        return photos != null && photos.size() > 0 ? photos.get(0) : null;
    }

    public List<Photo> findPhotoByActivityId(int user_id) {
        return getListFromRequest("id_hobbyactivity=?", user_id);
    }

    public Photo createPhoto(Photo photo) {
        PreparedStatement statement = null;
        ResultSet result = null;
        if (photo == null) {
            throw new CustomException(CustomException.ERROR_NULL, 1);
        } else {
            boolean exists;
            try {
                exists = (this.findPhotoById(photo.getId()) != null);
            } catch (NullPointerException Ex) {
                exists = false;
            }
            if (exists) {
                throw new CustomException(CustomException.ERROR_DUPLICATE_ID, 2);
            } else {
                try {
                    statement = getUpdateStatement(photo,
                            "INSERT INTO photo (id, title, path, description, id_hobbyactivity)"
                                    + " VALUES (null,?,?,?,?)");
                    statement.executeUpdate();
                    result = statement.getGeneratedKeys();
                    if (result.next()) {
                        photo.setId(result.getInt(1));
                    }
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, result);
                }
            }
        }
        return photo;
    }

    public Photo updatePhoto(int id, Photo photo) {
        PreparedStatement statement = null;
        if (photo == null) {
            throw new CustomException(CustomException.ERROR_NULL, 1);
        } else {
            if (this.findPhotoById(id) != null) {
                try {
                    statement = getUpdateStatement(photo,
                            "UPDATE photo SET title=?, path=?, description=?, id_hobbyactivity=? WHERE id=" + id);
                    statement.executeUpdate();
                    photo.setId(id);
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, null);
                }
            } else {
                throw new CustomException(CustomException.ERROR_NOTFOUND, 3);
            }
        }
        return photo;
    }

    public boolean deletePhoto(int id) {
        PreparedStatement statement = null;
        int deleted = 0;
        try {
            statement = Database.getInstance().prepareStatement("DELETE FROM photo WHERE id=?");
            statement.setInt(1, id);
            deleted = statement.executeUpdate();
        } catch (Exception e) {
            LOG.debug(e.getMessage());
        } finally {
            Database.closeSqlResources(statement, null);
        }
        return deleted > 0;
    }
}
