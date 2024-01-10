import { Component } from '@angular/core';
import Swal from 'sweetalert2';
import { delay } from "rxjs";
import { config } from '../environments/config';
import { environment } from 'src/environments/environment';
import { Router } from '@angular/router';
import { AnimationOptions } from 'ngx-lottie';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'Prassi DTI';

  currentLang: any = navigator.language.split('-')[0]
components: any;

  constructor(
    private _router: Router
  ) {
  }

  ngOnInit() {

    };

  }
