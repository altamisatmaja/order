<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- wajib --}}
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Order</title>
</head>

<body>
    <h1>Pesanan</h1>

    <form id="orderForm">
        <input type="text" id="reference_number" placeholder="cth. ORD-1414" required>
        <button type="submit">Tambah Pesanan</button>
    </form>

    <p id="message"></p>
    <ul id="orderList"></ul>

    {{-- kita perlu javascript --}}

    <script>
        const csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
        // apa bedanya kalau langsung pake blade compact()
        // dari pada ribet pakai script kayak gini?

        async function fetchOrders() {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/orders');
                const result = await response.json();
                console.log(result.data);
                console.log(result.status);

                if (result.status === 'success') {
                    const list = document.getElementById('orderList');
                    list.innerHTML = "";
                    // order ini  sebagai alias 
                    // dari 1 / satu data / tiap tiap data 
                    // yang ada di result.data
                    result.data.forEach(order => {
                        const li = document.createElement('li');
                        li.textContent = `#${order.id} - ${order.reference_number}`;
                        list.appendChild(li);
                    })
                    document.getElementById('message').textContent = result.message;
                } else {
                    document.getElementById('message').textContent = 'Gagal mengambil data';
                }
            } catch (error) {
                document.getElementById('message').textContent = 'Terjadi kesalahan';
            }
        }

        async function addOrder(reference_number) {
            const response = await fetch('http://127.0.0.1:8000/api/orders/tambah', {
                'method': 'POST',
                'headers': {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                'body': JSON.stringify({
                    'reference_number': reference_number
                })
            });

            const result = await response.json();
            document.getElementById('message').textContent = result.message;
            document.getElementById('reference_number').value = "";
            fetchOrders();
        }

        // untuk submit
        document.getElementById('orderForm').addEventListener('submit', async (e) => {
            const refnum = document.getElementById('reference_number').value;
            await addOrder(refnum);
        });

        fetchOrders();
    </script>
</body>

</html>
