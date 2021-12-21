package com.example.sedaya.core.di

import com.example.sedaya.core.data.repository.AppRepository
import org.koin.dsl.module

val repositoryModule = module {
    single { AppRepository(get(), get()) }
}