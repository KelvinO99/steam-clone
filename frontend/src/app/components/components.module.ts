import { OfferCarouselComponent } from './store/offer-carousel/offer-carousel.component';

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TranslateModule } from '@ngx-translate/core';
import { ComponentsRoutingModule } from './components-routing.module';
import { MatTableModule } from '@angular/material/table';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatSortModule } from '@angular/material/sort';
import { MatFormFieldModule } from '@angular/material/form-field';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MatExpansionModule } from '@angular/material/expansion';
import { MatIconModule } from '@angular/material/icon';
import { MatInputModule } from '@angular/material/input';
import { MatDialogModule } from '@angular/material/dialog';
import { SweetAlert2Module } from '@sweetalert2/ngx-sweetalert2';
import { BaseComponent } from './base/base.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { HomeComponent } from './home/home.component';
import { StoreComponent } from './store/store.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { MatCardModule} from '@angular/material/card';
import { ProductBannersComponent } from './store/product-banners/product-banners.component';
import { GameTableComponent } from './store/game-table/game-table.component';
import { CategoryCarouselComponent } from './store/category-carousel/category-carousel.component';
import { MatTabsModule } from '@angular/material/tabs';
import { UpdatesOfferCardsComponent } from './store/updates-offer-cards/updates-offer-cards.component';
import { MatButtonModule } from '@angular/material/button';
import { DataGameComponent } from './game-page/header-data-game/header-data-game.component';
import { BigButtonsComponent } from './store/big-buttons/big-buttons.component';
import { GameComponent } from './game-page/game-page.component';
import { BodyDataGameComponent } from './game-page/body-data-game/body-data-game.component';
import { BodyNavbarComponent } from './body-navbar/body-navbar.component';
import { SteamDeckComponent } from './steam-deck/steam-deck.component';
@NgModule({
  declarations: [
    BaseComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    StoreComponent,
    SidebarComponent,
    ProductBannersComponent,
    UpdatesOfferCardsComponent,
    OfferCarouselComponent,
    ProductBannersComponent,
    GameTableComponent,
    CategoryCarouselComponent,
    DataGameComponent,
    BigButtonsComponent,
    GameComponent,
    BodyDataGameComponent,
    BodyNavbarComponent,
    SteamDeckComponent,

  ],
  imports: [
    CommonModule,
    ComponentsRoutingModule,
    TranslateModule,
    MatSortModule,
    MatTableModule,
    MatPaginatorModule,
    MatFormFieldModule,
    ReactiveFormsModule,
    MatExpansionModule,
    MatIconModule,
    MatInputModule,
    MatDialogModule,
    FormsModule,
    SweetAlert2Module,
    MatCardModule,
    MatCardModule,
    MatTabsModule,
    MatButtonModule,
  ],
  exports: [CommonModule, TranslateModule, BaseComponent],
})
export class ComponentsModule {}
export class CardFancyExample {}
