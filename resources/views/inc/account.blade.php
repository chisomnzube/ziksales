              @auth
                <img src="../img/user.png" class="img-thumbnail rounded-circle" alt="John Thor">
                <div class="media-body ml-3 pt-4">
                  <h4>{{$user->name." ".$user->lname}}</h4>
                  <div class="small text-muted">Joined {{$user->created_at}}</div>
                  
                  
                </div>
              </div>
              <hr>
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link {{url()->current() == 'https://ziksales.com/my-profile' ? 'active' : ''}}" href="{{ route('users.edit') }}">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{url()->current() == 'https://ziksales.com/my-orders' ? 'active' : ''}}" href="{{ route('orders.index') }}">Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{url()->current() == 'https://ziksales.com/wishlist' ? 'active' : ''}}" href="{{ route('wishlist.index') }}">Wishlist</a>
                </li>
                @if($seller->email != auth()->user()->email)                  
                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('seller.register') }}">Become a seller</a>
                  </li>
                @else
                  @if($seller->featured != true)
                    <li class="nav-item">
                      <a class="nav-link" >Seller's Account Awaiting Approval</a>
                    </li>
                  @else
                      <li class="nav-item">
                        <a class="nav-link " href="{{ route('seller.index') }}">Seller's Portal</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="{{ route('seller.brand') }}">Branding</a>
                      </li>
                  @endif  
                @endif 
              </ul>
                @endauth