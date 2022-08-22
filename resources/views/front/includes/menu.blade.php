 <div id="menu" class="menu-block d-none">
     <div class="menu-content">
         <a href="#" id="menu-close" class="menu-close">
             <img src="images/close-white.svg" height="30" alt="close">
         </a>
         <ol class="menu pt-lg-5">
             <li>
                 <a href="/">Главная</a>
             </li>
             <li>
                 <a href="/buy-credit.html">Пополнить ходы. Касса</a>
             </li>
             <li>
                 <a href="/hot-price.html">Hot Price (Сканди)</a>
             </li>
             <li>
                 <a href="/top-price.html">Top Price (Классик)</a>
             </li>
             <li>
                 <a href="/category-page.html">Категория</a>
             </li>
             <li>
                 <a href="/bin.html">Корзина</a>
             </li>
             <li>
                 <a href="/profile.html">Личные данные</a>
             </li>
             <li>
                 <a href="/buy-credit.html">Мои ходы</a>
             </li>
             <li>
                 <a href="/archive.html">Архив лотов</a>
             </li>
             <li>
                 <a href="/winners.html">Победители</a>
             </li>
             <li>
                 <a href="/company.html">О нас</a>
             </li>
             @auth
                 <li>
                     <form action="{{ route('login.logout') }}" method="post">
                         @csrf
                         <button style="border:none;background-color:rgba(0, 0, 0,0.0);color:white;padding:0;margin:0;" type="submit">Выйти</button>
                     </form>
                 </li>
             @endauth
         </ol>
     </div>
 </div>
