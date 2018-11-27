package com.example.entities;

import java.io.Serializable;
import java.sql.Date;

import com.example.entities.Entities;

public class Booking extends Entities implements Serializable {
    private static final long serialVersionUID = 1L;
    private int user_id;
    private int n_people;
    private Date date;
    private int hour;
    private int minute;
    private int activity_id;

    public Booking(){}

    /**
     * @return the hour
     */
    public int getHour() {
        return hour;
    }

    /**
     * @param hour the hour to set
     */
    public void setHour(int hour) {
        this.hour = hour;
    }

    /**
     * @return the minute
     */
    public int getMinute() {
        return minute;
    }

    /**
     * @param minute the minute to set
     */
    public void setMinute(int minute) {
        this.minute = minute;
    }

    /**
     * @return the activity_id
     */
    public int getActivity_id() {
        return activity_id;
    }

    /**
     * @param activity_id the activity_id to set
     */
    public void setActivity_id(int activity_id) {
        this.activity_id = activity_id;
    }

    public Booking(int id, int user_id, int n_people, Date date, int hour, int minute, int activity_id) {
        this.id = id;
        this.user_id = user_id;
        this.n_people = n_people;
        this.date = date;
        this.hour = hour;
        this.minute = minute;
        this.activity_id = activity_id;
    }

    /**
     * @return the user_id
     */
    public int getUser_id() {
        return user_id;
    }

    /**
     * @return the date
     */
    public Date getDate() {
        return date;
    }

    /**
     * @param date the date to set
     */
    public void setDate(Date date) {
        this.date = date;
    }

    /**
     * @return the n_people
     */
    public int getN_people() {
        return n_people;
    }

    /**
     * @param n_people the n_people to set
     */
    public void setN_people(int n_people) {
        this.n_people = n_people;
    }

    /**
     * @param user_id the user_id to set
     */
    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }
}