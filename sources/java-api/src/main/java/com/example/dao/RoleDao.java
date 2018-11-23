package com.example.dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;
import java.util.Map;

import com.example.Database;
import com.example.entities.Role;
import com.example.exception.CustomException;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

public class RoleDao extends AbstractDao<Role> {
    private static final Log LOG = LogFactory.getLog(RoleDao.class);
    private static final String SQL_SELECT_REQUEST = "SELECT * FROM role WHERE ";

    public RoleDao() {
        super(SQL_SELECT_REQUEST);
    }

    @Override
    protected void getObjectFromResultSet(Map<Integer, Role> map, ResultSet result) throws SQLException {
        Role role = new Role(result.getInt("id"), result.getString("label"));
        map.put(role.getId(), role);
    }

	@Override
	protected PreparedStatement getUpdateStatement(Role role, String request) throws SQLException {
        PreparedStatement statement = null;
        statement = Database.getInstance().prepareStatement(request, PreparedStatement.RETURN_GENERATED_KEYS);
        statement.setString(1, role.getLabel());
        return statement;
    }
    
    public List<Role> findAllRoles() {
        return getListFromRequest("1", null);
    }

   
    public Role findRoleById(int id) {
        List<Role> roles = getListFromRequest("id=?", id);
        return roles != null && roles.size() > 0 ? roles.get(0) : null;
    }

    public Role createRole(Role role) {
        PreparedStatement statement = null;
        ResultSet result = null;
        if (role == null) {
            throw new CustomException(CustomException.ERROR_NULL,1);
        } else {
            boolean exists;
            try {
                exists = (this.findRoleById(role.getId()) != null);
            } catch (NullPointerException Ex) {
                exists = false;
            }
            if (exists) {
                throw new CustomException(CustomException.ERROR_DUPLICATE_ID, 2);
            } else {
                try {
                    statement = getUpdateStatement(role,
                    "INSERT INTO role (id, label) VALUES (null,?)");
                    statement.executeUpdate();
                    result = statement.getGeneratedKeys();
                    if (result.next()) {
                        role.setId(result.getInt(1));
                    }
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, result);
                }
            }
        }
        return role;
    }

    public Role updateRole(int id, Role role) {
        PreparedStatement statement = null;
        if (role == null) {
            throw new CustomException(CustomException.ERROR_NULL,1);
        } else {
            if (this.findRoleById(id) != null) {
                try {
                    statement = getUpdateStatement(role, 
                    "UPDATE role SET label=? WHERE id=" + id);
                    statement.executeUpdate();
                    role.setId(id);
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, null);
                }
            } else {
                throw new CustomException(CustomException.ERROR_NOTFOUND, 3);
            }
        }
        return role;
    }

    public boolean deleteRole (int id) {
        PreparedStatement statement = null;
        int deleted = 0;
        try {
            statement = Database.getInstance().prepareStatement("DELETE FROM role WHERE id=?");
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