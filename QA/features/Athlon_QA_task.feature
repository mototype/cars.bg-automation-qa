Feature: Athlon QA task
 As a QA who is interested in Athlon
 I want to solve interview task
 So that I can be confident if get invited on a meeting
Scenario: User can search on make, model and year
 Given I am on "http://www.cars.bg/" home page
 When I search for "BMW" make and "525" model and "2010" year
 And I click on Search button
 Then I should see correct results list
Scenario: User can search on make, model and engine fuel type
 Given I am on "http://www.cars.bg/" home page
 When I search for "BMW" make and "525" model and "Дизел" fuel
 And I click on Search button
 Then I should see correct results list
Scenario: User can search new cars on brand only
 Given I am on "http://www.cars.bg/" home page
 When I click on "BMW" make logo in New cars catalogue section
 Then I should see correct results list