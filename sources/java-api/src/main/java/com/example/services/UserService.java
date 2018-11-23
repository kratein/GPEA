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

import com.example.dao.UserDao;
import com.example.entities.User;
import com.example.exception.CustomException;

@Path("/user")
@Produces(MediaType.APPLICATION_JSON)
public class UserService implements BaseService<User>{
    private final UserDao userDao = new UserDao();

    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    public Response create(User user) {
        Response response;
        if (user == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(userDao.createUser(user)).build();
            } catch (CustomException cException) {
                response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
            }
        }
        return response;
    }

    @POST
    @Path("/connect")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response connect(User user) {
        Response response;
        response = Response.status(Status.OK).entity(userDao.findUserByProvider(user)).build();     
        return response;
    }

    @PUT
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response update(@PathParam("id") int id, User user) {
        Response response;
        if (user == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(userDao.updateUser(id, user)).build();
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
            response = Response.status(Status.OK).entity(userDao.deleteUser(id)).build();
        } catch (CustomException cException){
            response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
        }
        return response;
    }

    @GET
    @Path("/all")
    public Response getAll() {
        return Response.status(Status.OK).entity(userDao.findAllUsers()).build();
    }

    @GET
    @Path("{id}")
    public Response get(@PathParam("id") int id) {
        return Response.status(Status.OK).entity(userDao.findUserById(id)).build();
    }

    @GET
    @Path("role/{id}")
    public Response getByRole(@PathParam("id") int id) {
        return Response.status(Status.OK).entity(userDao.findUsersByRole(id)).build();
    }
}