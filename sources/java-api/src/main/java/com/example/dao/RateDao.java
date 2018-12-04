package com.example.dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import com.example.Database;
import com.example.entities.Rate;
import com.example.exception.CustomException;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

public class RateDao extends AbstractDao<Rate> {

    private static final Log LOG = LogFactory.getLog(RateDao.class);
    private static final String SQL_SELECT_REQUEST = "SELECT * FROM rate WHERE ";

    public RateDao() {
        super(SQL_SELECT_REQUEST);
    }

    @Override
    protected void getObjectFromResultSet(Map<Integer, Rate> map, ResultSet result) throws SQLException {
        Rate rate = new Rate(result.getInt("id"), result.getString("label"), result.getInt("id_activity"));
        map.put(rate.getId(), rate);
    }

	@Override
	protected PreparedStatement getUpdateStatement(Rate rate, String request) throws SQLException {
        PreparedStatement statement = null;
        statement = Database.getInstance().prepareStatement(request, PreparedStatement.RETURN_GENERATED_KEYS);
        statement.setString(1, rate.getLabel());
        return statement;
    }
    
    public List<Rate> findAllRates() {
        return getListFromRequest("1", null);
    }

    public List<Rate> findRatesByIdActivity(int id_activity) {
        List<Rate> rates = new ArrayList<>();
        ResultSet result;
        Statement statement;
        try {
            statement = Database.getInstance().createStatement();
            result = statement.executeQuery("SELECT * from has_rates WHERE id_activity="+id_activity);
            while (result.next()) {
                Rate rate = findRateById(result.getInt("id_rate"));
                if (!rates.contains(rate)) {
                    rates.add(rate);
                }
            }
        } catch(SQLException sqlException) {
            throw new CustomException("An error has occured, can't connect to databse",4);
        }
        return rates;
    }

    public Rate findRateById(int id) {
        List<Rate> rates = getListFromRequest("id=?", id);
        return rates != null && rates.size() > 0 ? rates.get(0) : null;
    }

    public Rate createRate(Rate rate) {
        PreparedStatement statement = null;
        ResultSet result = null;
        if (rate == null) {
            throw new CustomException(CustomException.ERROR_NULL,1);
        } else {
            boolean exists;
            try {
                exists = (this.findRateById(rate.getId()) != null);
            } catch (NullPointerException Ex) {
                exists = false;
            }
            if (exists) {
                throw new CustomException(CustomException.ERROR_DUPLICATE_ID, 2);
            } else {
                try {
                    statement = getUpdateStatement(rate,
                    "INSERT INTO rate (id, label, id_activity) VALUES (null,?,?)");
                    statement.executeUpdate();
                    result = statement.getGeneratedKeys();
                    if (result.next()) {
                        rate.setId(result.getInt(1));
                    }
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, result);
                }
            }
        }
        return rate;
    }

    public Rate updateRate(int id, Rate rate) {
        PreparedStatement statement = null;
        if (rate == null) {
            throw new CustomException(CustomException.ERROR_NULL,1);
        } else {
            if (this.findRateById(id) != null) {
                try {
                    statement = getUpdateStatement(rate, 
                    "UPDATE rate SET label=? WHERE id=" + id);
                    statement.executeUpdate();
                    rate.setId(id);
                } catch (SQLException e) {
                    LOG.debug(e.getMessage());
                } finally {
                    Database.closeSqlResources(statement, null);
                }
            } else {
                throw new CustomException(CustomException.ERROR_NOTFOUND, 3);
            }
        }
        return rate;
    }

    public boolean deleteRate (int id) {
        PreparedStatement statement = null;
        int deleted = 0;
        try {
            statement = Database.getInstance().prepareStatement("DELETE FROM rate WHERE id=?");
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