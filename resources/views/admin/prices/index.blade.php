<x-layouts.admin.layout>
    <x-admin.container.header title="Prices"/>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <!-- Upload Form -->
                <div class="col-md-12">
                    <form action="{{ route('admin.prices.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="price_file">Upload Excel File</label>
                            <input type="file" class="form-control" name="price_file" id="price_file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>

                <!-- Prices Table -->
                <h2 class="mt-5">Current Prices</h2>
                <div class="col-md-12">
                    @if($prices)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Recommended</th>
                                         <!-- Get shop names from the first item -->
                                        @php
                                            $shopNames = [];
                                            // Get the first category and product to extract shop names
                                            if (!empty($prices)) {
                                                $firstCategory = reset($prices);
                                                $firstProduct = reset($firstCategory);
                                                if (isset($firstProduct['shpos'])) {
                                                    $shopNames = array_keys($firstProduct['shpos']);
                                                }
                                            }
                                        @endphp
                                        @foreach($shopNames as $shopName)
                                            <th>{{ $shopName }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prices as $category => $products)
                                        @foreach($products as $product => $details)
                                            <tr>
                                                <td>{{ $category }}</td>
                                                <td>{{ $product }}</td>
                                                <td><img src="{{ $details['image'] }}" alt="{{ $product }}" style="width: 100px;"></td>
                                                <td>{{ $details['recommended'] }}</td>
                                                @foreach($details['shpos'] as $shop => $price)
                                                    <td>{{ $price }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No prices available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
