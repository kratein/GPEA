package com.example.entities;

import java.io.Serializable;

public class Role extends Entities implements Serializable {

    private static final long serialVersionUID = 1L;
    private String label;

    public Role(){}
    public Role(int id, String label) {
        this.id = id;
        this.label = label;
    }

    /**
     * @return the label
     */
    public String getLabel() {
        return label;
    }

    /**
     * @param label the label to set
     */
    public void setLabel(String label) {
        this.label = label;
    }


}