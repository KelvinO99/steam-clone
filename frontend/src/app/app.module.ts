import { APP_INITIALIZER, NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { TranslateLoader, TranslateModule } from '@ngx-translate/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HTTP_INTERCEPTORS, HttpClient, HttpClientModule } from "@angular/common/http";
import { TranslateHttpLoader } from "@ngx-translate/http-loader";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { MatProgressSpinnerModule } from "@angular/material/progress-spinner";
import { InterceptorService } from "./shared/helpers/interceptor.service";
import { ComponentsModule } from './components/components.module';
import { SweetAlert2Module } from '@sweetalert2/ngx-sweetalert2';
import { AuthService } from './shared/services/auth.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable, catchError, of, tap } from 'rxjs';
import { LottieModule } from 'ngx-lottie';

export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http);
}

export function playerFactory(): any {
  return import('lottie-web');
}

function initializeAppFactory(auth: AuthService, router: Router, aRoute: ActivatedRoute): () => Observable<any> {
  // Get logged user if exists
  return () => auth.getUser(true)
    .pipe(
      tap(response => {
        auth.currentUser.next(response?.data);
      }),
      catchError((error: any) => {
        if (aRoute.snapshot.url.toString().includes('auth/login')) {
        } else if (error.status === 401) {
          auth.currentUser.next(null);
          router.navigate(['/auth/login']);
        }
        return of(error);
      }),
    );
}

@NgModule({
  declarations: [
    AppComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    HttpClientModule,
    MatProgressSpinnerModule,
    ComponentsModule,
    SweetAlert2Module.forRoot(),
    TranslateModule.forRoot({
      loader: {
        provide: TranslateLoader,
        useFactory: HttpLoaderFactory,
        deps: [HttpClient]
      }
    }),
    LottieModule.forRoot({ player: playerFactory })
  ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: InterceptorService,
      multi: true,
    },
    {
      provide: APP_INITIALIZER,
      useFactory: initializeAppFactory,
      deps: [AuthService, Router, ActivatedRoute],
      multi: true,
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
