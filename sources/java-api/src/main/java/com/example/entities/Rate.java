package com.example.entities;

public class Rate extends Entities {

    private static final long serialVersionUID = 1L;
    private String label;
    private int id_activity;

    @Override
    public String toString() {
        return "{" + 
            " id='" + getId() + "'" +
            " label='" + getLabel() + "'" +
            ", id_activity='" + getId_activity() + "'" +
            "}";
    }

    public Rate(int id, String label, int id_activity) {
        this.id = id;
        this.label = label;
        this.id_activity = id_activity;
    }

    public Rate() {
    }


    public int getId_activity() {
        return this.id_activity;
    }

    public void setId_activity(int id_activity) {
        this.id_activity = id_activity;
    }

    public String getLabel() {
        return this.label;
    }

    public void setLabel(String label) {
        this.label = label;
    }
    

}