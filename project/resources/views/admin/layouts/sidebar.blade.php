<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.dashboard.show') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش فروش</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>ویترین</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.category.index') }}">دسته بندی</a>
                    <a href="{{ route('admin.market.brand.index') }}">برندها</a>
                    <a href="{{ route('admin.market.product.index') }}">کالاها</a>
                </section>
            </section>


            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>پرداخت ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                <a href="#">تمام پرداخت ها</a>
                    <a href="#">پرداخت های آنلاین</a>
                    <a href="#">پرداخت های آفلاین</a>
                    <a href="#">پرداخت در محل</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="#">تخفیف عمومی</a>
                    <a href="#">فروش شگفت انگیز</a>
                </section>
            </section>

            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>روش های ارسال</span>
            </a>

            <section class="sidebar-part-title">بخش محتوی</section>
            <a href="{{ route('admin.content.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی</span>
            </a>
            <a href="{{ route('admin.content.posts.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پست ها</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نظرات</span>
            </a>
       
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سوالات متداول</span>
            </a>
        


        </section>
    </section>
</aside>
