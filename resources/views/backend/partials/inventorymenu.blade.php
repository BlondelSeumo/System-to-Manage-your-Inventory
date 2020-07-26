<nav id="main-nav" role="navigation">
    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-mint">
        <li><a href="{{ url('admin/home') }}">{!! trans('menu.home') !!}</a></li>

        <li><a href="javascript:void(0)">AUTHORIZATION</a>
            <ul>
                <li><a href="{{ url('admin/register') }}">Add New User</a></li>
                {{--<li><a href="userPrivilegeIndex">Set User Previlege</a></li>--}}
                <li><a href="{{ url('admin.password.request') }}">Change User Password</a></li>
                {{--<li><a href="javascript:void(0)">Reset Default Password</a></li>--}}
            </ul>
        </li>

        <li><a href="javascript:void(0)">PRODUCTS</a>
            <ul>
                <li><a href="{{ url('admin.category.index') }}">Product Category</a></li>
                <li><a href="{{ url('admin.subcategory.index') }}">Product Sub Category</a></li>
                <li><a href="{{ url('admin.brand.index') }}">Product Brands</a></li>
                <li><a href="{{ url('admin.unit.index') }}">Product Units</a></li>
                <li><a href="{{ url('admin.size.index') }}">Product Sizes</a></li>
                <li><a href="{{ url('admin.color.index') }}">Product Colors</a></li>
                <li><a href="{{ url('admin.model.index') }}">Product Models</a></li>
                <li><a href="{{ url('admin.tax.index') }}">List of Taxes</a></li>
                {{--<li><a href="taxGroupIndex">Taxes Group</a></li>--}}
                {{--<li><a href="godownIndex">Godown Info</a></li>--}}
                {{--<li><a href="rackIndex">Rack Info</a></li>--}}
                {{--<li><a href="relationshipIndex">Customers / Suppliers</a></li>--}}
                <li><a href="{{ url('admin.product.index') }}">New Product</a></li>
                <li><a href="{{ url('product.desc.index') }}">Add Product Descriptions</a></li>
            </ul>
        </li>

        <li><a href="javascript:void(0)">REQUISITION</a>
            <ul>
                <li><a href="{{ url('create.requisition.index') }}">Create Requisition</a></li>
                <li><a href="{{ url('edit.requisition.index') }}">Edit Requisition</a></li>
                <li><a href="{{ url('approve.requisition.index') }}">Approve Requisition</a></li>
                <li><a href="{{ url('print.requisition.index') }}">Print Requisition</a></li>
            </ul>
        </li>

        <li><a href="javascript:void(0)">PURCHASE</a>
            <ul>
                <li><a href="{{ url('backend.suppilers.index') }}">Add Supplier Data</a></li>
                <li><a href="{{ url('item.purchase.index') }}">Purchase Product</a></li>
                <li><a href="{{ url('edit.purchase.index') }}">Edit Purchase</a></li>
                <li><a href="{{ url('approve.purchase.index') }}">Approve Purchase</a></li>
                <li><a href="{{ url('receive.product.index') }}">Received Product</a></li>
                {{--<li><a href="#">Return Product</a></li>--}}
            </ul>
        </li>

        <li><a href="javascript:void(0)">SALES</a>
            <ul>
                <li><a href="{{ url('backend.customers.index') }}">Add Customer Data</a></li>
                <li><a href="{{ url('sales.invoice.index') }}">Sales Invoice</a></li>
                <li><a href="{{ url('edit.invoice.index') }}">Edit Invoice</a></li>
                <li><a href="{{ url('approve.invoice.index') }}">Approve Invoice</a></li>
                {{--<li><a href="delivery.invoice.index">Delivery Product</a></li>--}}
                <li><a href="{{ url('print.challan.index') }}">Print Delivery Challan</a></li>
                <li><a href="{{ url('print.invoice.index') }}">Print Sales Invoice</a></li>
                <li><a href="#">Return Product</a></li>
            </ul>
        </li>

        <li><a href="javascript:void(0)">REPORTS</a>
            <ul>
                <li><a href="{{ url('product.list.index') }}">Product List</a></li>
                <li><a href="{{ url('product.ledger.index') }}">Product Ledger</a></li>
                <li><a href="#"></a></li>
            </ul>
        </li>


    </ul>
    <br/>
</nav>
