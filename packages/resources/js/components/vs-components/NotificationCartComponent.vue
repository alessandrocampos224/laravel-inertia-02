<template>
  <li class="dropdown dropdown-notification nav-item">
    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"
      ><i class="ficon feather" :class="icon"></i
      ><span class="badge badge-pill badge-primary badge-up cart-item-count"
        >{{number}}</span
      ></a
    >
    <!--  -->
    <ul
      class="dropdown-menu dropdown-menu-media dropdown-cart dropdown-menu-right"
    >
      <!--  -->
      <li class="dropdown-menu-header">
        <div class="dropdown-header m-0 p-2">
          <h3 class="white">
            <span class="cart-item-count">{{number}}</span
            ><span class="mx-50">{{title}}</span>
          </h3>
          <span class="notification-title">{{subtitle}}</span>
        </div>
      </li>
      <!--  -->
      <slot></slot>
      <!--  -->
      <li class="dropdown-menu-footer">
        <a
          class="dropdown-item p-1 text-center text-primary"
          href="app-ecommerce-checkout.html"
          ><i class="feather icon-shopping-cart align-middle"></i
          ><span class="align-middle text-bold-600">Checkout</span></a
        >
      </li>
      <li class="empty-cart d-none p-2">Your Cart Is Empty.</li>
    </ul>
  </li>
</template>

<script>
export default {
    props: ['title', 'subtitle', 'icon', 'number']
};
</script>

<style>
</style>