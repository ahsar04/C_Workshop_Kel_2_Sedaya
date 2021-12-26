package com.example.sedaya.ui.home.adapter

import android.annotation.SuppressLint
import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.sedaya.core.data.source.model.Category
import com.example.sedaya.core.data.source.model.Product
import com.example.sedaya.databinding.ItemHomeCategoryBinding
import com.example.sedaya.databinding.ItemHomeProdukTerlarisBinding
import com.inyongtisto.myhelper.extension.coret
import com.inyongtisto.myhelper.extension.toGone
import com.inyongtisto.myhelper.extension.toRupiah
import com.inyongtisto.myhelper.extension.toVisible

@SuppressLint("NotifyDataSetChanged")
class ProdukTerlarisAdapter: RecyclerView.Adapter<ProdukTerlarisAdapter.ViewHolder>() {

    private var data = ArrayList<Product>()

    inner class ViewHolder(private val itemBinding: ItemHomeProdukTerlarisBinding) : RecyclerView.ViewHolder(itemBinding.root) {
        fun bind(item: Product, position: Int) {
            itemBinding.apply {
                val harga = item.harga?: 0
                tvName.text = item.name
                imageView.setImageResource(item.image)
                tvHarga.text = item.harga.toRupiah()
                tvPengiriman.text = item.pengiriman
                tvReting.text = "" + item.rating + " | Tampil " + item.terjual + " kali"

                if (item.discount != 0) {
                    lyGrosir.toGone()
                    lyDiskon.toVisible()
                    tvDiscount.text = "${item.discount}%"

                    tvHarga.text = (harga - ((item.discount.toDouble() / 100 )* harga)).toRupiah()
                    tvHargaAsli.text = item.harga.toRupiah()
                    tvHargaAsli.coret()
                }
            }
        }
    }

    fun addItems(items:List<Product>) {
        data.addAll(items)
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        return ViewHolder(
            ItemHomeProdukTerlarisBinding.inflate(
            LayoutInflater.from(parent.context),
            parent,
            false)
        )
    }

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        holder.bind(data[position], position)
    }

    override fun getItemCount(): Int {
        return data.size
    }

}