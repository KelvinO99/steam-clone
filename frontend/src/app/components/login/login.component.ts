import { User } from './../../shared/services/user.service';
import { Component, OnInit, HostListener } from '@angular/core';
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
  col_8!: string;
  col_2!: string;
  screenWidth = window.screen.width;

  constructor(private router: Router, public authService: AuthService) {
    this.onResize();
  }

  @HostListener('window:resize', ['$event'])
  onResize(event?: undefined) {
    this.screenWidth = window.innerWidth;
    this.updateSize();
  }

  updateSize() {
    if (this.screenWidth < 768) {
      this.col_8 = 'col-xs-8 p-0 m-0';
      this.col_2 = 'col-xs-2 p-0 m-0';
    } else if (this.screenWidth >= 768 && this.screenWidth < 992) {
      this.col_8 = 'col-sm-8 p-0 m-0';
      this.col_2 = 'col-sm-2 p-0 m-0';
    } else if (this.screenWidth >= 992 && this.screenWidth < 1200) {
      this.col_8 = 'col-md-8 p-0 m-0';
      this.col_2 = 'col-md-2 p-0 m-0';
    } else if (this.screenWidth >= 1200) {
      this.col_8 = 'col-lg-8 p-0 m-0';
      this.col_2 = 'col-lg-2 p-0 m-0';
    }
  }

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
