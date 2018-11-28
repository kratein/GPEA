package com.example.services;

import com.example.dao.PhotoDao;
import com.example.entities.Photo;
import com.example.exception.CustomException;

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

@Path("/photo")
@Produces(MediaType.APPLICATION_JSON)
public class PhotoService implements BaseService<Photo>{

    private final PhotoDao photoDao = new PhotoDao();

    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    public Response create(Photo photo) {
        Response response;
        if (photo == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {          
                response = Response.status(Status.OK).entity(photoDao.createPhoto(photo)).build();
            } catch (CustomException cException) {
                response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
            }
        }
        return response;
    }

    @PUT
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response update(@PathParam("id") int id, Photo photo) {
        Response response;
        if (photo == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(photoDao.updatePhoto(id, photo)).build();
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
            response = Response.status(Status.OK).entity(photoDao.deletePhoto(id)).build();
        } catch (CustomException cException){
            response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
        }
        return response;
    }

    @GET
    @Path("/all")
    public Response getAll() {
        return Response.status(Status.OK).entity(photoDao.findAllPhotos()).build();
    }

    @GET
    @Path("{id}")
    public Response get(@PathParam("id") int id) {
        return Response.status(Status.OK).entity(photoDao.findPhotoById(id)).build();
    }
    
    @GET
    @Path("activity/{id}")
    public Response getByActivityId(@PathParam("id") int activity_id) {
        return Response.status(Status.OK).entity(photoDao.findPhotoByActivityId(activity_id)).build();
    }
}