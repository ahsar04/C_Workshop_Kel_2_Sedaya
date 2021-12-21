package com.example.sedaya.core.data.source.remote

import com.example.sedaya.core.data.source.remote.network.ApiService
import com.example.sedaya.core.data.source.remote.request.LoginRequest

class RemoteDataSorce(private val api: ApiService) {

    suspend fun login(data : LoginRequest) = api.login(data)

}