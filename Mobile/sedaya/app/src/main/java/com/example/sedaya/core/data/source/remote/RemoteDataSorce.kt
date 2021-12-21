package com.example.sedaya.core.data.source.remote

import com.example.sedaya.core.data.source.remote.network.ApiService

class RemoteDataSorce(private val api: ApiService) {

    suspend fun login() = api.login()

}