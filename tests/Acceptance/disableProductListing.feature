Feature: Disable a product listing. 

  In order to disable a product listing
  As an admin
  I need to have a "disable product" button

  Scenario: Admin disables a product listing
	Given the admin is on the product listing disable page
	When they select and confirm the product listing they want to disable
	Then they should see a success message indicating that the product listing has been disabled

  Scenario: Admin enables a previously disabled product listing
	Given the admin is on the product listing enable page
	When they select and confirm the disabled product listing they want to enable
	Then they should see a success message indicating that the product listing has been enabled
