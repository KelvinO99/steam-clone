import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdateOfferCardsV2Component } from './update-offer-cards-v2.component';

describe('UpdateOfferCardsV2Component', () => {
  let component: UpdateOfferCardsV2Component;
  let fixture: ComponentFixture<UpdateOfferCardsV2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ UpdateOfferCardsV2Component ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(UpdateOfferCardsV2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
