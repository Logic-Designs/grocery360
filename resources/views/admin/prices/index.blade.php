<x-layouts.admin.layout>
    <x-admin.container.header title="Prices"/>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12">
                    <form action="{{ route('admin.prices.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="price_file">Upload Excel File</label>
                            <input type="file" class="form-control" name="price_file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>

                <div class="col-md-12 mt-5">
                    <h2>Current Prices</h2>
                    @foreach($products as $product)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5>{{ $product->name }} ({{ $product->category->name }})</h5>
                                <ul>
                                    @foreach($product->prices as $price)
                                        <li>{{ $price->shop->name }}: ${{ $price->price }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
