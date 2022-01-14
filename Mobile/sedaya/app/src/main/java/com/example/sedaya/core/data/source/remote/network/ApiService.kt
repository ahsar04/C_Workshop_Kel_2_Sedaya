package com.example.sedaya.core.data.source.remote.network

import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.example.sedaya.core.data.source.remote.request.RegisterRequest
import com.example.sedaya.core.data.source.remote.request.UpdateProfileRequest
import com.example.sedaya.core.data.source.remote.response.LoginResponse
import okhttp3.MultipartBody
import okhttp3.RequestBody
import retrofit2.Call
import retrofit2.Response
import retrofit2.http.*

interface ApiService {

    @POST("login.php")
    suspend fun login(
        @Body login: LoginRequest,
    ): Response<LoginResponse>

    //https://localhost/Sedaya/API/register
    @POST("register.php")
    suspend fun register(
        @Body data: RegisterRequest
    ): Response<LoginResponse>

    @PUT("update-profile.php/{usr_id}")
    suspend fun updateUser(
        @Path("usr_id") int: Int,
        @Body data: UpdateProfileRequest
    ): Response<LoginResponse>

    @Multipart
    @POST("upload-profile.php/{usr_id}")
    suspend fun uploadUser(
        @Path("usr_id") int: Int? = null,
        @Part data: MultipartBody.Part? = null
    ): Response<LoginResponse>

    @GET("seni.php")
    fun getSeni():Response<LoginResponse>
}