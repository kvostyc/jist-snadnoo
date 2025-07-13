describe('Table Reservation', () => {
  beforeEach(() => {
    cy.seedDatabase()
    cy.login()
  })

  it('user can create a reservation', () => {
    cy.visit('/')
    
    cy.get('[data-cy="date-select"]').should('be.visible').select(1)
    cy.get('[data-cy="time-select"]').select(1)
    cy.get('[data-cy="guests-select"]').select('2')

    cy.get('[data-cy="continue-to-table-selection"]').click()

    cy.get('svg').should('be.visible')
    
    cy.get('[data-cy-status="available"]').first().click()

    cy.get('[data-cy="reserve-table-button"]').click()

    cy.contains('Rezervácia potvrdená!').should('be.visible')
    cy.contains('Detaily rezervácie sme vám poslali na email.').should('be.visible')
  })

  it('can select specific table by ID', () => {
    cy.visit('/')

    cy.get('[data-cy="date-select"]').select(1)
    cy.get('[data-cy="time-select"]').select(1)
    cy.get('[data-cy="guests-select"]').select('2')
    cy.get('[data-cy="continue-to-table-selection"]').click()

    cy.get('[data-cy="table-1"]').click()
    
    cy.get('[data-cy="table-1"]').should('have.attr', 'stroke', '#f59e0b')
  })
})