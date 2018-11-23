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

import com.example.dao.TagDao;
import com.example.entities.Tag;
import com.example.exception.CustomException;

@Path("/tag")
@Produces(MediaType.APPLICATION_JSON)
public class TagService implements BaseService<Tag>{
    private final TagDao tagDao = new TagDao();

    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    public Response create(Tag tag) {
        Response response;
        if (tag == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(tagDao.createTag(tag)).build();
            } catch (CustomException cException) {
                response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
            }
        }
        return response;
    }

    @PUT
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response update(@PathParam("id") int id, Tag tag) {
        Response response;
        if (tag == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(tagDao.updateTag(id, tag)).build();
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
            response = Response.status(Status.OK).entity(tagDao.deleteTag(id)).build();
        } catch (CustomException cException){
            response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
        }
        return response;
    }

    @GET
    @Path("/all")
    public Response getAll() {
        return Response.status(Status.OK).entity(tagDao.findAllTags()).build();
    }

    @GET
    @Path("{id}")
    public Response get(@PathParam("id") int id) {
        return Response.status(Status.OK).entity(tagDao.findTagById(id)).build();
    }

    @GET
    @Path("/activity/{id}")
    public Response getTabByActivity(@PathParam("id") int id_activity) {  
        return Response.status(Status.OK).entity(tagDao.findTagsByIdActivity(id_activity)).build();
    }
}