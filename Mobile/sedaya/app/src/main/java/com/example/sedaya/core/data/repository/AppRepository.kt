package com.example.sedaya.core.data.repository

import com.example.sedaya.core.data.source.local.LocalDataSource
import com.example.sedaya.core.data.source.remote.RemoteDataSorce

class AppRepository(val local : LocalDataSource, val remote : RemoteDataSorce) {

}