package com.example.dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;
import java.util.Map;

import com.example.Database;
import com.example.entities.Booking;
import com.example.exception.CustomException;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

public class BookingDao extends AbstractDao<Booking> {
    private static final Log LOG = LogFactory.getLog(BookingDao.class);
    private static final String SQL_SELECT_REQUEST = "SELECT * FROM booking WHERE ";

    public BookingDao() {
        super(SQL_SELECT_REQUEST);
    }

    @Override
    protected void getObjectFromResultSet(Map<Integer, Booking> map, ResultSet result) throws SQLException {
        Booking booking = new Booking(result.getInt("id"), result.getInt("user_id"), result.getInt("n_people"), result.getDate("date"), result.getInt("activity_id"));
        map.put(booking.getId(), booking);
    }

	@Override
	protected PreparedStatement getUpdateStatement(Booking booking, String request) throws SQLException {
        PreparedStatement statement = null;
        statement = Database.getInstance().prepareStatement(request, PreparedStatement.RETURN_GENERATED_KEYS);
        statement.setInt(1, booking.getUser_id());
        statement.setInt(2, booking.getN_people());
        statement.setDate(3, booking.getDate());
        statement.setInt(4, booking.getActivity_id());
        return statement;
    }
    
    public List<Booking> findAllBookings() {
        return getListFromRequest("1", null);
    }


    public Booking findBookingById(int id) {
        List<Booking> bookings = getListFromRequest("id=?", id);
        return bookings != null && bookings.size() > 0 ? bookings.get(0) : null;
    }

    public Booking createBooking(Booking booking) {
        PreparedStatement statement = null;
        ResultSet result = null;
        if (booking == null) {
            throw new CustomException(CustomException.ERROR_NULL,1);
        } else {
            boolean exists;
            try {
                exists = (this.findBookingById(booking.getId()) != null);
            } catch (NullPointerException Ex) {
                exists = false;
            }
            if (exists) {
                throw new CustomException(CustomException.ERROR_DUPLICATE_ID, 2);
            } else {
                try {
                    statement = getUpdateStatement(booking,
                    "INSERT INTO booking (id, user_id, n_people, date, activity_id) VALUES (null,?,?,?,?)");
                    statement.executeUpdate();
                    result = statement.getGeneratedKeys();
                    if (result.next()) {
                        booking.setId(result.getInt(1));
                    }
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, result);
                }
            }
        }
        return booking;
    }

    public Booking updateBooking(int id, Booking booking) {
        PreparedStatement statement = null;
        if (booking == null) {
            throw new CustomException(CustomException.ERROR_NULL,1);
        } else {
            if (this.findBookingById(id) != null) {
                try {
                    statement = getUpdateStatement(booking, 
                    "UPDATE booking SET user_id=?, n_people=?, date=?, activity_id=? WHERE id=" + id);
                    statement.executeUpdate();
                    booking.setId(id);
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, null);
                }
            } else {
                throw new CustomException(CustomException.ERROR_NOTFOUND, 3);
            }
        }
        return booking;
    }

    public boolean deleteBooking (int id) {
        PreparedStatement statement = null;
        int deleted = 0;
        try {
            statement = Database.getInstance().prepareStatement("DELETE FROM booking WHERE id=?");
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