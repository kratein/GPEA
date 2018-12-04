package com.example.services;

import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.Status;

import com.example.dao.RateDao;
import com.example.entities.Rate;
import com.example.exception.CustomException;

@Path("/rate")
@Produces(MediaType.APPLICATION_JSON)
public class RateService implements BaseService<Rate> {
    private final RateDao rateDao = new RateDao();

    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    public Response create(Rate rate) {
        Response response;
        if (rate == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(rateDao.createRate(rate)).build();
            } catch (CustomException cException) {
                response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
            }
        }
        return response;
    }

    @PUT
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response update(@PathParam("id") int id, Rate rate) {
        Response response;
        if (rate == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(rateDao.updateRate(id, rate)).build();
            } catch (CustomException cException) {
                response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
            }
        }
        return response;
    }

    @DELETE
    @Path("{id}")
    public Response delete(@PathParam("id") int id) {
        Response response;
        try {
            response = Response.status(Status.OK).entity(rateDao.deleteRate(id)).build();
        } catch (CustomException cException){
            response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
        }
        return response;
    }

    @GET
    @Path("/all")
    public Response getAll() {
        return Response.status(Status.OK).entity(rateDao.findAllRates()).build();
    }

    @GET
    @Path("{id}")
    public Response get(@PathParam("id") int id) {
        return Response.status(Status.OK).entity(rateDao.findRateById(id)).build();
    }

    @GET
    @Path("/activity/{id}")
    public Response getTabByActivity(@PathParam("id") int id_activity) {  
        return Response.status(Status.OK).entity(rateDao.findRatesByIdActivity(id_activity)).build();
    }

}