import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BigButtonsComponent } from './big-buttons.component';

describe('BigButtonsComponent', () => {
  let component: BigButtonsComponent;
  let fixture: ComponentFixture<BigButtonsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BigButtonsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(BigButtonsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
