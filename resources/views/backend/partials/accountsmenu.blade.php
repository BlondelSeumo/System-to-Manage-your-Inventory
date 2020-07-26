<nav id="main-nav" role="navigation">

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
        <li><a href="{{ url('accounts/home') }}">Home</a></li>

        <li><a href="javascript:void(0)">Authorization</a>
            <ul>
                <li><a href="{{ url('accounts/register') }}">Add New User</a></li>
                <li><a href="{{ url('accounts/userPrivilegeIndex') }}">Set User Previlege</a></li>
                <li><a href="{{ url('accounts/changePassword') }}">Change User Password</a></li>
                <li><a href="javascript:void(0)">Reset Default Password</a></li>
            </ul>
        </li>

        <li><a href="javascript:void(0)">Basic</a>
            <ul>
                <li><a href="{{ url('accounts/company/index') }}">Company Settings</a></li>
                <li><a href="{{ url('accounts/projectIndex') }}">Projects</a></li>
                <li><a href="{{ url('accounts/fiscalPeriodIndex') }}">Fiscal Period</a></li>
                <li><a href="{{ url('accounts/accountGroupIndex') }}">Account Groups</a></li>
                <li><a href="{{ url('accounts/accountHeadIndex') }}">Account Heads</a></li>
                <li><a href="{{ url('accounts/openingBalanceIndex') }}">Opening Balance</a></li>
                <li><a href="{{ url('accounts/depreciationIndex') }}">Fixed Asset Depreciation</a></li>
                <li><a href="{{ url('accounts/anualBudgetIndex') }}">Anual Budget To Expense</a></li>
            </ul>
        </li>

        <li><a href="javascript:void(0)">Voucher</a>
            <ul>
                <li><a href="javascript:void(0)">Payments</a>
                    <ul>
                        <li><a href="{{ url('accounts/transactions/cashPaymentIndex') }}">Cash Payments</a></li>
                        <li><a href="{{ url('accounts/transactions/bankPaymentIndex') }}">Bank Payments</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0)">Receives</a>
                    <ul>
                        <li><a href="{{ url('accounts/transactions/cashReceiveIndex') }}">Cash Receive</a></li>
                        <li><a href="{{ url('accounts/transactions/bankReceiveIndex') }}">Bank Receive</a></li>
                    </ul>
                </li>

                <li><a href="{!! url('accounts/transactions/journalIndex') !!}">Journal Voucher</a></li>
                <li><a href="{!! url('transaction.edit.index') !!}">Edit Unposted Vouchers</a></li>
                <li><a href="{!! url('transaction.post.index') !!}">Check & Approve Vouchers</a></li>

            </ul>
        </li>

        <li><a href="javascript:void(0)">Reports</a>
            <ul>
                <li><a href="{!! url('report.dailytrans.rpt') !!}">Daily Transaction List</a></li>
                <li><a href="{!! url('report.dailyvoucher.rpt') !!}">View Print Voucher</a></li>

                {{--<li><a href="javascript:void(0)">Unposted</a>--}}
                {{--<ul>--}}
                {{--<li><a href="{!! route('report.account.tb') !!}">Trial Ballance AC</a></li>--}}
                {{--<li><a href="{!! route('report.group.tb') !!}">Trial Ballance Group</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}

                <li><a href="javascript:void(0)">Trial Balance</a>
                    <ul>
                        <li><a href="{!! url('posted.account.tb') !!}">Trial Ballance</a></li>
                        <li><a href="{!! url('posted.group.tb') !!}">Trial Ballance Group</a></li>
                    </ul>
                </li>
                <li><a href="{!! url('general.ledger.index') !!}">General Ledger</a></li>

                <li><a href="javascript:void(0)">Register</a>
                    <ul>
                        <li><a href="{!! url('cash.register.index') !!}">Cash Register</a></li>
                        <li><a href="{!! url('bank.register.index') !!}">Bank Register</a></li>
                    </ul>
                </li>



                {{--<li><a href="{!! route('cash.register.index') !!}">Cash Register</a></li>--}}
                {{--<li><a href="{!! route('bank.register.index') !!}">Bank Register</a></li>--}}

                <li><a href="test.view">test</a></li>
            </ul>
        </li>

        <li><a href="javascript:void(0)">Statements</a>
            <ul>
                <li><a href="{!! url('fn.statement.add') !!}">Add Statement</a></li>
                <li><a href="{!! url('fn.statement.create') !!}">Create Statement Data</a></li>
                <li><a href="{!! url('fn.statement.process') !!}">Process Statement Data</a></li>
                <li><a href="{!! url('fn.statement.print') !!}">Print Statement</a></li>
            </ul>
        </li>

    </ul>
    <br/>
</nav>