import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HTTP_INTERCEPTORS, HttpClient, HttpClientModule } from "@angular/common/http";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import {MatSidenavModule} from '@angular/material/sidenav';
import { MatProgressSpinnerModule } from "@angular/material/progress-spinner";
import { ComponentsModule } from './components/components.module';
import { SweetAlert2Module } from '@sweetalert2/ngx-sweetalert2';
import { ActivatedRoute, Router } from '@angular/router';
import { SpecialOffersComponent } from './components/special-offers/special-offers.component';
import { CarouselComponent } from './components/carousel/carousel.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    FooterComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    HttpClientModule,
    MatProgressSpinnerModule,
    ComponentsModule,
    MatSidenavModule,
    SweetAlert2Module.forRoot(),
    ReactiveFormsModule
  ],
  providers: [
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
