package com.example.sedaya.ui.home

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import androidx.lifecycle.ViewModelProvider
import com.example.sedaya.core.data.source.remote.network.ApiConfig
import com.example.sedaya.core.data.source.remote.response.LoginResponse
import com.example.sedaya.databinding.FragmentHomeBinding
import com.example.sedaya.ui.home.adapter.CategoryAdapter
import com.example.sedaya.ui.home.adapter.ProdukTerbaruAdapter
import com.example.sedaya.ui.home.adapter.ProdukTerlarisAdapter
import com.example.sedaya.ui.home.adapter.SliderAdapter
import com.example.sedaya.util.Constans
import com.example.sedaya.util.Prefs
import com.inyongtisto.myhelper.extension.getInitial
import com.squareup.picasso.Callback
import com.squareup.picasso.Picasso
import retrofit2.Call

class HomeFragment : Fragment() {

    private lateinit var viewModel: HomeViewModel
    private var _binding: FragmentHomeBinding? = null
    private val binding get() = _binding!!
    private val adapterCategory = CategoryAdapter()
    private val adapterSlider = SliderAdapter()

    private val adapterProdukTerlaris = ProdukTerlarisAdapter()
    private val adapterProdukTerbaru = ProdukTerbaruAdapter()

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        viewModel =
            ViewModelProvider(this).get(HomeViewModel::class.java)

        _binding = FragmentHomeBinding.inflate(inflater, container, false)
        val root: View = binding.root


        setupAdapter()
        setData()
        mainButton()
        return root
    }




    private fun setupAdapter() {
        binding.rvCategory.adapter = adapterCategory
        binding.rvSlider.adapter = adapterSlider
        binding.rvProductTerlaris.adapter = adapterProdukTerlaris
        binding.rvProductTerbaru.adapter = adapterProdukTerbaru
    }

    private fun setData() {
        viewModel.listCategory.observe(requireActivity(), {
            adapterCategory.addItems(it)
        })

        viewModel.listSlider.observe(requireActivity(), {
            adapterSlider.addItems(it)
        })

        viewModel.listProduct.observe(requireActivity(), {
            adapterProdukTerlaris.addItems(it)
            adapterProdukTerbaru.addItems(it)
        })
    }

    fun mainButton() {

    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}