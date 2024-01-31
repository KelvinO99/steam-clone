import { User } from './../../shared/services/user.service';
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
  loginForm!: FormGroup;

  constructor(private router: Router, public authService: AuthService) {}

  ngOnInit() {
    this.loginForm = new FormGroup({
      username: new FormControl(null, Validators.required),
      password: new FormControl(null, Validators.required),
    });
  }
  
  goTo(destination: string): void {
    this.router.navigate(['register']);
  }

loginUser() {
    this.authService.signIn(this.loginForm.value).subscribe((res) => {
      if (res) {

        this.loginForm.reset();
        this.router.navigate(['']);
      }
    });
}
}
