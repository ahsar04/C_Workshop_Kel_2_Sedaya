package com.example.sedaya.core.data.source.remote.network

import okhttp3.RequestBody
import retrofit2.Response
import retrofit2.http.GET
import retrofit2.http.POST

interface ApiService {

    @POST("login")
    suspend fun login(
            //@Body user: User
    ): Response<RequestBody>

    //https://localhost/Sedaya/API/register
    @POST("register")
    suspend fun register(
        //@Body user: User
    ): Response<RequestBody>
}