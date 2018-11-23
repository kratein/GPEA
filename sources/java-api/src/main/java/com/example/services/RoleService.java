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

import com.example.dao.RoleDao;
import com.example.entities.Role;
import com.example.exception.CustomException;

@Path("/role")
@Produces(MediaType.APPLICATION_JSON)
public class RoleService implements BaseService<Role>{
    private final RoleDao roleDao = new RoleDao();

    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    public Response create(Role role) {
        Response response;
        if (role == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(roleDao.createRole(role)).build();
            } catch (CustomException cException) {
                response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
            }
        }
        return response;
    }

    @PUT
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response update(@PathParam("id") int id, Role role) {
        Response response;
        if (role == null) {
            response = Response.status(Status.NO_CONTENT).build();
        } else {
            try {
                response = Response.status(Status.OK).entity(roleDao.updateRole(id, role)).build();
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
            response = Response.status(Status.OK).entity(roleDao.deleteRole(id)).build();
        } catch (CustomException cException){
            response = Response.status(Status.BAD_REQUEST).entity(cException.toString()).build();
        }
        return response;
    }

    @GET
    @Path("/all")
    public Response getAll() {
        return Response.status(Status.OK).entity(roleDao.findAllRoles()).build();
    }

    @GET
    @Path("{id}")
    public Response get(@PathParam("id") int id) {
        return Response.status(Status.OK).entity(roleDao.findRoleById(id)).build();
    }
}