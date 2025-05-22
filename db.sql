Table orders {
  id int [pk, increment]
  reference_number int
  status bool
}

Table order_details {
  id int [pk, increment] # -> $table->id();
  order_id int [ref: > orders.id]
  deskripsi text
  nama_produk varchar(255)
  harga_produk int
}