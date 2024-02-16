import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductBannersComponent } from './product-banners.component';

describe('ProductBannersComponent', () => {
  let component: ProductBannersComponent;
  let fixture: ComponentFixture<ProductBannersComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ProductBannersComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ProductBannersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
