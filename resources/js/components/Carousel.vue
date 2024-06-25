<template>
  <VueSlickCarousel v-if="products.length" > 0 v-bind="settings" class="flex justify-center mt-32 carousel" >

     <div v-for="(product, index) in products" :key="index">
 <a :href="' product.photo->getUrl()' " target="_blank" style="display: inline-block">
                                        <img :src=" 'product.photo'">
                                    </a>
        <h1 v-text="product.name">{{product.name}}</h1>
        <p v-text="product.price">{{product.price}}</p>
    </div>


</VueSlickCarousel>
</template>
<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

	export default (
		{

              name: 'MyComponent',
              components: { VueSlickCarousel },

			data()  {
                return{
                    settings: {
                        "arrows": false,
                        "dots": true,
                        "infinite": true,
                        "slidesToShow": 2,
                        "slidesToScroll": 1,
                        "autoplay": true,
                        "speed": 2000,
                        "autoplaySpeed": 2000,
				},
                   products:[],

                }

            },



			components: {
				VueSlickCarousel,
			},
            mounted(){
                axios.get('/products')
                .then(response =>this.products = response.data);

            },
            });

</script>

<style lang="scss" scoped>
.slick-slider {
	width: 85%;
    height:auto;
    margin:auto;
    margin-top:100px;
	div {
		outline: none;
        height:auto;
        background-color: #2f3241;
	}
	h1 {
		text-align: center;

		color: #abe8f6;
		line-height: 100px;
		margin: 3px;
        font-size: 5rem;
	}
	::v-deep .slick-arrow:before {
		color: #2f3241;
    opacity: 1;
  }
}
</style>
