<div class="product-area most-popular related-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Sản phẩm</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($relatedProducts as $key => $product)
                        @include('frontend.products.components.single', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
