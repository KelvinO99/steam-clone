import { Component } from '@angular/core';
import Swal from 'sweetalert2';
import { LoaderService } from './shared/helpers/loader.service';
import { delay } from "rxjs";
import { TranslateService } from "@ngx-translate/core";
import { config } from '../environments/config';
import { environment } from 'src/environments/environment';
import { Router } from '@angular/router';
import { HttpContextConfig } from './shared/models/http-context-config';
import { AnimationOptions } from 'ngx-lottie';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'Prassi DTI';
  loading = false;
  components = {
    header: config.header.active,
    sidebar: config.sidebar.active,
    footer: config.footer.active
  };

  options: AnimationOptions = {
    path: '/assets/lottie/loader.json',
    autoplay: true,
    loop: true
  };

  currentLang: any = navigator.language.split('-')[0]

  constructor(
    private _loading: LoaderService,
    private translate: TranslateService,
    private _router: Router
  ) {
    if (environment.production) {
      console.warn(`🚨 Console output is disabled on production!`)
      console.log = function () { };
      console.warn = function () { };
      console.info = function () { };
      // console.error = function () { };
    }
    translate.addLangs(['it', 'en']);
    translate.setDefaultLang(this.currentLang);
    translate.use(this.currentLang);
  }

  ngOnInit() {
    // verifica che tutti i componenti siano attivati correttamente secondo la configurazione
    this._router.events.subscribe((event: any) => {
      Object.keys(this.components).forEach(component => {
        this.isComponentActive(component);
      });
    });

    this.listenToLoading();

    let config = new HttpContextConfig();
    config.noSpinner = true;
    config.isPublic = true;
  }

  listenToLoading(): void {
    this._loading.loadingSub
      .pipe(delay(0)) // This prevents a ExpressionChangedAfterItHasBeenCheckedError for subsequent requests
      .subscribe((loading) => {
        this.loading = loading;
      });
  }

  isComponentActive(component: string = 'header') {
    let configuration: string[] = config[component as keyof typeof config].exception ? config[component as keyof typeof config].exception : [];
    if (configuration.length > 0) {
      this.components[component as keyof typeof this.components] = !configuration.includes(window.location.pathname);
    }
  }
}

export const toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
