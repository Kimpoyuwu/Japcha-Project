<?php
                     foreach ($getCoupon as $gCoupon):
                  ?>

                  

<div class="modal fade" id="editModal<?= $gCoupon['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editCouponModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editCouponModalLabel">Edit Coupon</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="../includes/add-coupon.inc.php" method="post">
                          <div class="form-group"> <input type="hidden" value ="<?= $gCoupon['id']?>" name ="couponID">
                              <label for="editCouponCode">Coupon Code</label>
                              <input required type="text" class="form-control" id="editCouponCode" value ="<?= $gCoupon['coupon_code'] ?>" name="editCouponCode" placeholder="Enter coupon code">
                          </div>
                          <div class="form-group">
                              <label for="editOfferName">Offer Name</label>
                              <input required type="text" class="form-control" id="editOfferName" name="editOfferName" value="<?= $gCoupon['offer_name'] ?>" placeholder="Enter offer name">
                          </div>
                          <div class="form-group">
                              <label for="editDiscount">Discount (%)</label>
                              <input required type="text" class="form-control" id="editDiscount" name="editDiscount" value ="<?= $gCoupon['discount_percentage'] ?>" placeholder="Enter discount percentage">
                          </div>
                          <div class="form-group">
                              <label for="editDiscount">Quantity</label>
                              <input required type="text" class="form-control" id="editQuantity" name="editQuantity" value ="<?= $gCoupon['Quantity'] ?>" placeholder="Enter quantity">
                          </div>
                          <div class="form-group">
                              <label for="editStartTime">Start Time</label>
                              <input required type="datetime-local" class="form-control" id="editStartTime" name="editStartTime" value ="<?= $gCoupon['start_time'] ?>">
                          </div>
                          <div class="form-group">
                              <label for="editEndTime">End Time</label>
                              <input required type="datetime-local" class="form-control" id="editEndTime" name="editEndTime" value ="<?= $gCoupon['end_time'] ?>">
                          </div>
                          <div class="modal-footer">
                              <!-- Inside your table loop where you output coupon data -->
                                <!-- Inside your table loop where you output coupon data -->
                              <td>
                                  <button type="button" class="btn edit-button"name="ConfirmButton" data-toggle ="modal" data-target="#confirmationModal<?= $gCoupon['id']?>">Update</button>
                                  <button type="button" class="btn" style="background-color: #dc3545; border-color: #dc3545; color: #ffffff;" data-dismiss="modal">Close</button>
                              </td> 

                        
                          </div>

                          <!-- Confirmation Modal -->
                            <div class="modal fade" id="confirmationModal<?= $gCoupon['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Coupon</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to have changes?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name ="updateButton">Save changes</button>

                                        <script>
                                            function submitForm(formId) {
                                        document.getElementById(formId).submit();
                                        }
                                        </script>
                                    </div>
                                    </div>
                            </div>
                        </div>
                          
                      </form>
                  </div>
              </div>
          </div>
      </div>


      <?php 
                       endforeach;
                  ?>  







