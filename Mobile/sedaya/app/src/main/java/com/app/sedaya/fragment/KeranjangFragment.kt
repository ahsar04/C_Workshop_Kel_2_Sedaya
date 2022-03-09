package com.app.sedaya.fragment

import android.content.Intent
import android.os.Bundle
import android.text.Layout
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.ProgressBar
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.widget.SearchView
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout
import androidx.viewpager.widget.ViewPager
import com.app.sedaya.R
import com.app.sedaya.activity.RiwayatActivity
import com.app.sedaya.adapter.AdapterListSeni
import com.app.sedaya.adapter.AdapterSeni
import com.app.sedaya.adapter.AdapterSeniSemua
import com.app.sedaya.adapter.AdapterSlider
import com.app.sedaya.app.ApiConfig
import com.app.sedaya.model.ResponModel
import com.app.sedaya.model.Seni
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


class KeranjangFragment : Fragment() {

//    lateinit var vpSlider : ViewPager
    lateinit var rvSeni: RecyclerView
    lateinit var rvSearchSeni: RecyclerView
    lateinit var swipeRefresh: SwipeRefreshLayout
    lateinit var btn_riwayat : ImageView
    lateinit var no_data : TextView
    lateinit var tvError : TextView
    lateinit var SearchView : SearchView
    lateinit var pb : ProgressBar
    private var listSeni: ArrayList<Seni> = ArrayList()
//    lateinit var rekomSeni : TextView
//    lateinit var seniBaru : TextView
//    lateinit var slider : ViewPager
//    lateinit var rvSeniBaru : RecyclerView
//    lateinit var rvRekomSeni : RecyclerView
//    lateinit var rvProdukTerlasir: RecyclerView
//    lateinit var rvElektronik: RecyclerView

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {

        val view : View = inflater.inflate(R.layout.fragment_keranjang, container, false)

        btn_riwayat = view.findViewById(R.id.btn_riwayat)
        btn_riwayat.setOnClickListener {
            startActivity(Intent(requireContext(), RiwayatActivity::class.java))
        }

        init(view)
        getSeni()
        getListSeni()
        refresh()
        displaySearch()
        return view
    }
    private fun refresh() {
        swipeRefresh.setOnRefreshListener {
            getSeni()
            swipeRefresh.isRefreshing = false
        }
    }

    fun displaySeni() {
        rvSeni.adapter = AdapterSeniSemua(requireActivity(), listSeni)
    }
    fun displaylistSeni() {
        rvSearchSeni.adapter = AdapterListSeni(requireActivity(), listSeni)
    }

    fun getSeni() {
        ApiConfig.instanceRetrofit.getSeni().enqueue(object : Callback<ResponModel> {
            override fun onFailure(call: Call<ResponModel>, t: Throwable) {
            }
            override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                val res = response.body()!!
                if (res.code == 200) {
                    listSeni = res.seni
                    displaySeni()
                }
            }
        })
    }

    fun getListSeni() {
        pb.visibility = View.GONE
        ApiConfig.instanceRetrofit.getSeni().enqueue(object : Callback<ResponModel> {
            override fun onFailure(call: Call<ResponModel>, t: Throwable) {
            }
            override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                val res = response.body()!!
                if (res.code == 200) {
                    pb.visibility = View.GONE
                    listSeni = res.seni
                    displaylistSeni()
                }
            }
        })
    }

    private fun displaySearch() {

        SearchView.setOnQueryTextListener(object : SearchView.OnQueryTextListener{
            override fun onQueryTextSubmit(query: String?): Boolean {
                if (query?.isEmpty() == true){
                    rvSeni.visibility = View.VISIBLE
                    rvSearchSeni.visibility = View.GONE
                } else{
                    pb.visibility = View.VISIBLE
                    rvSeni.visibility = View.GONE
                    ApiConfig.instanceRetrofit.getSearch(query?.toLowerCase()!!).enqueue(object :  Callback<ResponModel>{
                        override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                            pb.visibility = View.GONE
                            val res = response.body()!!
                            if (res.code == 200) {
                                rvSearchSeni.visibility = View.VISIBLE
                                listSeni = res.seni
                                displaylistSeni()
                            }else if (res.seni == null){
                                no_data.visibility = View.VISIBLE
                                error(res.message)
                            }
                        }

                        override fun onFailure(call: Call<ResponModel>, t: Throwable) {
                            pb.visibility = View.GONE
                            tvError.visibility = View.VISIBLE
                            error(t.message.toString())
                        }

                    })
                }

                return false
            }

            override fun onQueryTextChange(newText: String?): Boolean {
                if (newText?.isEmpty() == true){
                    rvSeni.visibility = View.VISIBLE
                    rvSearchSeni.visibility = View.GONE
                } else{
                    pb.visibility = View.VISIBLE
                    rvSeni.visibility = View.GONE
                    ApiConfig.instanceRetrofit.getSearch(newText?.toLowerCase()!!).enqueue(object :  Callback<ResponModel>{
                        override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                            pb.visibility = View.GONE
                            val res = response.body()!!
                            if (res.code == 200) {
                                rvSearchSeni.visibility = View.VISIBLE
                                listSeni = res.seni
                                displaylistSeni()
                            }else if (res.seni == null){
                                no_data.visibility = View.VISIBLE
                                error(res.message)
                            }
                        }

                        override fun onFailure(call: Call<ResponModel>, t: Throwable) {
                            pb.visibility = View.GONE
                            tvError.visibility = View.VISIBLE
                            error(t.message.toString())
                        }

                    })
                }

                return false
            }

        })
    }



    fun init(view: View) {
        rvSeni = view.findViewById(R.id.rv_senisemua)
        swipeRefresh = view.findViewById(R.id.swipeRefresh)
        rvSearchSeni = view.findViewById(R.id.rv_searchSeni)
        no_data = view.findViewById(R.id.tv_noData)
        tvError = view.findViewById(R.id.tv_noData)
        SearchView = view.findViewById(R.id.edt_search)
        pb = view.findViewById(R.id.pb)
//        rekomSeni = view.findViewById(R.id.tv_rekomseni)
//        seniBaru = view.findViewById(R.id.tv_seniTerbaru)
//        rvSeniBaru = view.findViewById(R.id.rv_seni)
//        rvRekomSeni = view.findViewById(R.id.rv_senirekom)
//        rvElektronik = view.findViewById(R.id.rv_elektronik)
//        rvProdukTerlasir = view.findViewById(R.id.rv_produkTerlasir)
    }
}