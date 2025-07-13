// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************

Cypress.Commands.add('login', (email = 'test@example.com', password = 'password') => {
    cy.visit('/')

    cy.contains('Prihlásiť sa')
        .click()

    cy.get('#auth-modal')
        .should('be.visible')

    cy.get('input[name="email"]')
        .type(email)

    cy.get('input[name="password"]')
        .type(password)

    cy.get('[data-cy="button"]')
        .click()

    cy.get('#auth-modal').should('not.be.visible')
})

Cypress.Commands.add('seedDatabase', () => {
    cy.exec('php artisan migrate:fresh --seed')
})