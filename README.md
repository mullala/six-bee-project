While all the main functionalities are in place, the time constraint meant that not everything was done to a high standard. Main difference from the specification is the "Actions" column where the icons have not been implemented. There is no separate endpoint to "approve" an appointment, but this can still be done using the "edit appointment" page, which is accessed by clicking on the "YES" or "NO" in the "Approved?" column.

Further points to note:
- The registration was solved with the Laravel Breeze package. Although the specification states that the registration page is not required, I deliberately chose to leave this page in, as otherwise a different solution for populating the database would have to be developed. This page can be easily removed prior to deployment.
- Although the tests ensure that the security of the system is satisfied, this was solved with a conditional statement in every controller.In addition, the test for ensuring the unregistered user cannot delete the appointment was failing, hence the logic should be improved / corrected (this test was removed prior to the last commit). The overarching Appointment policy is missing and would be the first bit of code to optimize if the project should proceed.
- The date-time field is sent as a string and is not checked for formatting, although the frontend uses the html built-in datetime picker. This would be the next candidate for code optimization.
- Success messages have not yet been implemented.
- Although I am a proficient user of bootstrap's css, I am inexperienced with Tailwind, which meant that frontend styling took more time than necessary, and due to the time constraint, is not finished. You might notice an inline style declaration for the background of table cells, or that the Submit button on the update page is not green, or that the error message has no distinct style from the rest of the page. These compromises were made in order to deliver a usable product, and can be easily amended if the project should proceed.

Looking forward to your comments.
Lana
