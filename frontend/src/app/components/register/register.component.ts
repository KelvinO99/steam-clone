  import { MatExpansionModule } from '@angular/material/expansion';
  import { TranslateModule } from '@ngx-translate/core';
  import { Component } from '@angular/core';
  import { Form, FormControl, FormGroup, NgForm, Validators } from '@angular/forms';
  import { AbstractControl, ValidatorFn, ValidationErrors } from '@angular/forms';
  import { AuthService } from 'src/app/shared/services/auth.service';
  import { Router } from '@angular/router';

  @Component({
    selector: 'app-register',
    templateUrl: './register.component.html',
    styleUrls: ['./register.component.scss'],
  })
  export class RegisterComponent {
    country: string[] = [];
    registerForm!: FormGroup;
    confirmEmail!: FormControl
    count = 0;
    StrongPasswordRegx: RegExp =
      /^(?=[^A-Z]*[A-Z])(?=[^a-z]*[a-z])(?=\D*\d).{8,}$/;
    showEmailError = true;
    showEmailConfirmError = true;
    showDivError = true

    constructor(public authService: AuthService, private router: Router) {
      this.country = [
        'Afghanistan',
        'Aland Islands',
        'Albania',
        'Algeria',
        'American Samoa',
        'Andorra',
        'Angola',
        'Anguilla',
        'Antarctica',
        'Antigua and Barbuda',
        'Argentina',
        'Armenia',
        'Aruba',
        'Australia',
        'Austria',
        'Azerbaijan',
        'BL',
        'BQ',
        'Bahamas',
        'Bahrain',
        'Bangladesh',
        'Barbados',
        'Belarus',
        'Belgium',
        'Belize',
        'Benin',
      ];
    }

    ngOnInit() {
      this.registerForm = new FormGroup({
        email: new FormControl('', [Validators.required, Validators.email]),
        username: new FormControl('', [
          Validators.required,
          Validators.minLength(5),
          Validators.maxLength(30),
        ]),
        password: new FormControl('', [
          Validators.required,
          Validators.minLength(8),
          Validators.pattern(this.StrongPasswordRegx),
        ])
      });

      this.confirmEmail = new FormControl('', [Validators.required, Validators.email])
    }

    controlEmailForm() {
      const emailControl = this.registerForm.get('email');
      const confirmEmailControl = document.getElementById('confirmEmail') as HTMLInputElement;
    }

    controlPasswordForm() {
      console.log(this.registerForm);
    }

    registerUser() {
      this.authService.signUp(this.registerForm.value).subscribe((res) => {
        if (res) {
          console.log(res);

          this.registerForm.reset();
          this.router.navigate(['login']);
        }
      });

      console.log(this.registerForm);
      
    }
  }
