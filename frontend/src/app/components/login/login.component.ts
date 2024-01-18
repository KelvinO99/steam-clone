import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  loginform!: FormGroup;

  constructor() {}

  ngOnit() {

    this.loginform = new FormGroup({
      username: new FormControl(null, Validators.required),
      password: new  FormControl(null, Validators.required)
    })
  }

}
