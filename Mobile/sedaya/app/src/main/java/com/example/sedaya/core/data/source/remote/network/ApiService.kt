package com.example.sedaya.core.data.source.remote.network

import com.example.sedaya.core.data.source.remote.request.LoginRequest
import okhttp3.RequestBody
import retrofit2.Response
import retrofit2.http.Body
import retrofit2.http.Field
import retrofit2.http.GET
import retrofit2.http.POST

interface ApiService {

    @POST("login.php")
    suspend fun login(
        @Body login: LoginRequest,
    ): Response<RequestBody>

    //https://localhost/Sedaya/API/register
    @POST("register")
    suspend fun register(
        //@Body user: User
    ): Response<RequestBody>
}