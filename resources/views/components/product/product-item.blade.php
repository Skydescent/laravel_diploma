<div class="Product">
    <div class="ProductCard">
        <div class="ProductCard-look">
            <div class="ProductCard-photo">
                <div class="ProductCard-sale">-15%
                </div><img src={{$product->mainImage->path}} alt={{$product->mainImage->alt}}/>
            </div>
            <x-product.product-item-images :images="$product->attachment"/>
        </div>
        <div class="ProductCard-desc">
            <div class="ProductCard-header">
                <h2 class="ProductCard-title">{{$product->name}}</h2>
                <div class="ProductCard-info">
                    <div class="ProductCard-cost">
                        <div class="ProductCard-price">$55.00</div>
                        <div class="ProductCard-priceOld">$115.00</div>
                    </div>
                    <div class="ProductCard-compare"><a class="btn btn_default" href="#"><img class="btn-icon" src="assets/img/icons/card/change.svg" alt="change.svg"/></a></div>
                </div>
            </div>
            <div class="ProductCard-text">
                {{$product->description}}
            </div>
            <div class="ProductCard-cart">
                <div class="ProductCard-cartElement ProductCard-cartElement_amount">
                    <div class="Amount Amount_product">
                        <button class="Amount-remove" type="button"></button>
                        <input class="Amount-input form-input" name="amount" type="text" value="1"/>
                        <button class="Amount-add" type="button"></button>
                    </div>
                </div>
                <div class="ProductCard-cartElement"><a class="btn btn_primary" href="#"><img class="btn-icon" src="assets/img/icons/card/cart_white.svg" alt="cart_white.svg"/><span class="btn-content">Купить</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="Tabs Tabs_default">
        <div class="Tabs-links">
            <a class="Tabs-link_ACTIVE Tabs-link" href="#description"><span>Описание</span></a>
            <a class="Tabs-link" href="#sellers"><span>Продавцы</span></a>
            <a class="Tabs-link" href="#addit"><span>Характеристики</span></a>
            <a class="Tabs-link" href="#reviews"><span>Отзывы (3)</span></a>
        </div>
        <div class="Tabs-wrap">
            <div class="Tabs-block" id="description">
                <h2>Megano Store Hystory
                </h2>
                <p>Lorem ipsum dolor sit amet, consectetuer&#32;
                    <strong>adipiscing
                    </strong>&#32;elit doli. Aenean commodo ligula eget dolor. Aenean massa.&#32;<a href="#">Cumtipsu</a>&#32;sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eutu, pretiumem.
                </p><img class="pict pict_right" src="assets/img/content/home/bigGoods.png" alt="bigGoods.png"/>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetuer
                    </li>
                    <li>adipiscing elit doli.&#32;<em>Aenean</em>&#32;commodo ligula
                    </li>
                    <li>eget dolor. Aenean massa. Cumtipsu sociis
                    </li>
                    <li>natoque penatibus et magnis dis parturient
                    </li>
                    <li>montesti, nascetur ridiculus mus. Donec
                    </li>
                    <li>quam felis, ultricies nec, pellentesque eutu
                    </li>
                </ul>
                <div class="clearfix">
                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th>Табличка внутри описания</th>
                            <th>Значение
                            </th>
                        </tr>
                        <tr>
                            <td>ываыв</td>
                            <td>llslssl
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="Tabs-block" id="sellers">
                <div class="Categories Categories_product">
                    <div class="Categories-row">
                        <div class="Categories-block Categories-block_info">
                            <div class="Categories-info">
                                <strong>Очень дешево
                                </strong>
                            </div>
                        </div>
                        <div class="Categories-splitProps">
                        </div>
                        <div class="Categories-block Categories-price">
                            <strong>€&#32;40.58
                            </strong>
                        </div>
                        <div class="Categories-block Categories-button"><a class="btn btn_primary" href="#"><img class="btn-icon" src="assets/img/icons/card/cart_white.svg" alt="cart_white.svg"/><span class="btn-content">Купить</span></a>
                        </div>
                    </div>
                    <div class="Categories-row">
                        <div class="Categories-block Categories-block_info">
                            <div class="Categories-info">
                                <strong>pleer.ru
                                </strong>
                            </div>
                        </div>
                        <div class="Categories-splitProps">
                        </div>
                        <div class="Categories-block Categories-price">
                            <strong>€&#32;69.04
                            </strong>
                        </div>
                        <div class="Categories-block Categories-button"><a class="btn btn_primary" href="#"><img class="btn-icon" src="assets/img/icons/card/cart_white.svg" alt="cart_white.svg"/><span class="btn-content">Купить</span></a>
                        </div>
                    </div>
                    <div class="Categories-row">
                        <div class="Categories-block Categories-block_info">
                            <div class="Categories-info">
                                <strong>citilink.ru
                                </strong>
                            </div>
                        </div>
                        <div class="Categories-splitProps">
                        </div>
                        <div class="Categories-block Categories-price">
                            <strong>€&#32;112.69
                            </strong>
                        </div>
                        <div class="Categories-block Categories-button"><a class="btn btn_primary" href="#"><img class="btn-icon" src="assets/img/icons/card/cart_white.svg" alt="cart_white.svg"/><span class="btn-content">Купить</span></a>
                        </div>
                    </div>
                    <div class="Categories-row">
                        <div class="Categories-block Categories-block_info">
                            <div class="Categories-info">
                                <strong>М.Видео
                                </strong>
                            </div>
                        </div>
                        <div class="Categories-splitProps">
                        </div>
                        <div class="Categories-block Categories-price">
                            <strong>€&#32;197.32
                            </strong>
                        </div>
                        <div class="Categories-block Categories-button"><a class="btn btn_primary" href="#"><img class="btn-icon" src="assets/img/icons/card/cart_white.svg" alt="cart_white.svg"/><span class="btn-content">Купить</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Tabs-block" id="addit">
                <div class="Product-props">
                    <div class="Product-prop">
                        <strong>Lorem
                        </strong><span> Pfizer</span>
                    </div>
                    <div class="Product-prop">
                        <strong>ipsum
                        </strong><span> Lorem ipsum dolor sit</span>
                    </div>
                    <div class="Product-prop">
                        <strong>dolor sit
                        </strong><span> 5 ans</span>
                    </div>
                    <div class="Product-prop">
                        <strong>psum dolo
                        </strong><span> 2–3 jours</span>
                    </div>
                </div>
            </div>
            <div class="Tabs-block" id="reviews">
                <div class="Comments">
                    <div class="Comment">
                        <div class="Comment-column Comment-column_pict">
                            <div class="Comment-avatar">
                            </div>
                        </div>
                        <div class="Comment-column">
                            <header class="Comment-header">
                                <div>
                                    <strong class="Comment-title">Alexandra Brownie
                                    </strong><span class="Comment-date">22:50 - 25 Декабря 2020</span>
                                </div>
                            </header>
                            <div class="Comment-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eutu, pretiumem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justotuio, rhoncus ut loret, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus element semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae.
                            </div>
                        </div>
                    </div>
                </div>
                <header class="Section-header Section-header_product">
                    <h3 class="Section-title">Оставить отзыв</h3>
                </header>
                <div class="Tabs-addComment">
                    <form class="form" action="#" method="post">
                        <div class="form-group">
                            <textarea class="form-textarea" name="review" id="review" placeholder="Ваш комментарий..."></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="row-block">
                                    <input class="form-input" id="name" name="name" type="text" placeholder="Ваше Имя"/>
                                </div>
                                <div class="row-block">
                                    <input class="form-input" id="email" name="email" type="text" placeholder="Ваш Email"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn_muted" type="submit">Оставить отзыв</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>