import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
  loginform!: FormGroup;

  constructor(private router: Router, public authService: AuthService) {}

  ngOnInit() {
    this.loginform = new FormGroup({
      username: new FormControl(null, Validators.required),
      password: new FormControl(null, Validators.required),
    });
  }

  goTo(destination: string): void {
    this.router.navigate(['register']);
  }

  login() {
    this.authService.signIn(this.loginform.value);
  }
}
