package com.example.sedaya.core.di

import com.example.sedaya.core.data.source.local.LocalDataSource
import com.example.sedaya.core.data.source.remote.RemoteDataSorce
import com.example.sedaya.core.data.source.remote.network.ApiConfig
import org.koin.dsl.module

val appmodule = module {
    single { ApiConfig.provideApiService }

    single { RemoteDataSorce(get()) }

    single { LocalDataSource() }
}